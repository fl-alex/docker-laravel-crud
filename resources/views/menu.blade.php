<script src="{{ asset('jquery.js') }}"></script>

<span id="menu">
    <a href="{{ route('model1.index') }}" id="Model1">Model1</a>
    <a href="{{ route('model2.index') }}" id="Model2">Model2</a>
</span>


<script>
    $(document).ready(function (){
    // set bold to active href

        @isset($controllername)
            var url = "";
            var controllername = ("{{ $controllername }}");
            $('#menu > a').each(function(){
                url = $(this).attr('href');
                parts = url.split("/");
                last_part = $(parts).get(-1).toLowerCase();
                if (last_part==controllername.toLowerCase()){
                    $(this).addClass("font-weight-bold");
                }
            });
        @endisset

});
</script>

<style>
    .font-weight-bold {
        font-weight: bold;
    }
</style>
