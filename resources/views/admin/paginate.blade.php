<script>
    document.getElementById('pagination').onchange = function () {
        window.location = "{!! $list->url(1) !!}&items=" + this.value;
    };
</script>