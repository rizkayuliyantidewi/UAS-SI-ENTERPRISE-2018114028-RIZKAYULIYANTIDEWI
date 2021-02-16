<script>
    function deleteData(id) {
        var id = id;
        var url = '{{ route($routeName, ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
     }

     function formSubmit() {
        $("#deleteForm").submit();
     }
</script>