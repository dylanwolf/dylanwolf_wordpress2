    </div>
    <?php wp_footer() ?>
    <div class="screenshot-shadowbox" data-bind="visible: openedScreenshot"></div>
        <div class="screenshot-popup" data-bind="visible: openedScreenshot">
            <div class="screenshot-frame">
                <div class="close-icon">
                    <a href="#">&times;</a>
                </div>
                <img data-bind="attr: { title: openedScreenshotTitle, alt: openedScreenshotTitle, src: openedScreenshot }" />
            </div>
        </div>
    <script type="text/javascript">
        var model = {
            hamburgerOpen: ko.observable(false),
            openedScreenshot: ko.observable(null),
            openedScreenshotTitle: ko.observable(null)
        }

        $(document).ready(function() {
                $('.screenshot').click(function(evt) {
                    var container = $(evt.currentTarget)
                    var img = container.localName === 'div' ?
                        container :
                        container.find('img')

                    model.openedScreenshot(img.attr('src'))
                    model.openedScreenshotTitle(img.attr('title'))
                    evt.preventDefault()
                    return false;
                })
                $('.screenshot-popup .close-icon').click(function() {
                    model.openedScreenshot(null)
                    model.openedScreenshotTitle(null)
                })

                ko.applyBindings(model)
            })
    </script>
</body>
</html>