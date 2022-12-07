<div id="toastz"></div>
<script src="../../content/js/notification.js"></script>
<script>
    function showSuccessToast(title, message) {
        toast({
            title,
            message,
            type: "success",
            duration: 4000
        });
    }

    function showErrorToast(title, message) {
        toast({
            title,
            message,
            type: "error",
            duration: 4000
        });
    }
</script>