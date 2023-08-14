<script src="{{ asset('jquery.js') }}"></script>
<span id="menu">
    <a href="{{ route('companies.index') }}" id="companies">Companies</a> |
    <a href="{{ route('workers.index') }}" id="workers">Employees</a> |

</span>
<hr style="box-shadow: darkolivegreen 1px 1px 1px 1px">

<script>
    $(document).ready(function (){
    // set bold to active href

        @isset($routename)
            var url = "";
            var routename = ("{{ $routename }}");
            $('#menu > a').each(function(){
                url = $(this).attr('href');
                parts = url.split("/");
                last_part = $(parts).get(-1).toLowerCase();
                if (last_part==routename.toLowerCase()){
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
