<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    $(document).ready(function () {
        var isLoading = false;

        function loadMoreContent() {
            if (isLoading) return;
            var contentContainer = $("#posts");
            var loader = $("#loader");
            var scrollPosition = $(window).scrollTop();
            var windowHeight = $(window).height();
            var contentHeight = contentContainer.height();
            var scrollTrigger = 0.8;

            if ((scrollPosition + windowHeight) >= (contentHeight * scrollTrigger)) {
                isLoading = true;
                loader.show();

                // Perform an AJAX request to load more content
                $.get("your-content-endpoint.php", function (newContent) {
                    contentContainer.append(newContent);
                    loader.hide();
                    isLoading = false;
                });
            }
        }

        $(window).on("scroll", loadMoreContent);
    });
