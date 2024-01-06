<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $rooms;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->rooms = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);

        switch ($data['type']) {
            case 'join':
                $this->handleJoin($from, $data);
                break;
            case 'chat':
                $this->handleChat($from, $data);
                break;
        }
        // $numRecv = count($this->clients) - 1;
        // echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
        //     , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        //     $data = json_decode($msg, true);

        //     // Check if the 'post_id' key exists in the decoded data
            // if (isset($data['post_id'])) {
            //     $postId = $data['post_id'];
            //     foreach ($this->clients as $client) {
            //         if ($from !== $client) {
            //             // The sender is not the receiver, send to each client connected
            //             $client->send($postId);
            //         }
            // }
        // }
    }

    protected function handleJoin(ConnectionInterface $conn, $data) {
        $currentRoom = &$this->rooms;
        if (isset($data['circleId'])) {
            $circleId = $data['circleId'];
            if (!isset($currentRoom[$circleId])) {
                $currentRoom[$circleId] = [];                
            }
            $currentRoom = &$currentRoom[$circleId];
            if (isset($data['threadId'])) {
                $threadId = $data['threadId'];
                if (!isset($currentRoom[$threadId])) {
                    $currentRoom[$threadId] = []; 
                }
                $currentRoom = &$currentRoom[$threadId];
            }else{
                if (!isset($currentRoom['common'])) {
                    $currentRoom['common'] = []; 
                }
                $currentRoom = &$currentRoom['common'];
            }
        }

        // Add the connection to the leaf room
        $currentRoom[] = $conn;

        // Notify the user that they have joined the room
        $conn->send(json_encode(['type' => 'system', 'message' => "You have joined room with circleId: {$circleId}, threadId: {$threadId}"]));
    }

    protected function handleChat(ConnectionInterface $from, $data) {
        $circleId = $data['circleId'];
        $threadId = $data['threadId'];
        $post_id = $data['post_id'];
    
        // Check if the circleId exists
        if (isset($this->rooms[$circleId])) {
            // Check if the threadId exists in the circleId room
            if (isset($this->rooms[$circleId][$threadId])) {
                foreach ($this->rooms[$circleId][$threadId] as $client) {
                    if ($from !== $client) {
                        // The sender is not the receiver, send to each client connected
                        $client->send(json_encode(['type' => 'chat', 'circleId' => "{$circleId}", 'threadId' => "{$threadId}", 'post_id' => "{$post_id}"]));
                    }
                }
            } else {
                // Handle the case where the threadId room does not exist
                // You may want to create the threadId room or handle it in a specific way
                $from->send(json_encode(['type' => 'system', 'message' => "Thread with ID {$threadId} does not exist in circle {$circleId}"]));
            }
        } else {
            // Handle the case where the circleId room does not exist
            // You may want to create the circleId room or handle it in a specific way
            $from->send(json_encode(['type' => 'system', 'message' => "Circle with ID {$circleId} does not exist"]));
        }
    }
    
    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
