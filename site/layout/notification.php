<div id="toastz"></div>
<script src="../../content/js/notification.js"></script>
<script>
    function showSuccessToast(title, message) {
        toast({
            title,
            message,
            type: "success",
            duration: 5000
        });
    }

    function showErrorToast(title, message) {
        toast({
            title,
            message,
            type: "error",
            duration: 5000
        });
    }
</script>