<header class="shadow-md">
    <div class="flex  items-center justify-center h-[66px]">
        <div class="flex basis-1/3 justify-start items-center ml-7">
            <a href="/" class="mr-2">
                <img class="h-[38px] w-full rounded " src="https://fullstack.edu.vn/assets/f8-icon-lV2rGpF0.png" alt="">
            </a>
            <a href="" class="font-bold">Học lập trình để đi làm</a>
        </div>
        <div class="flex basis-1/3 justify-center text-[#000] flex items-center">
            <div><i class="fa-solid fa-magnifying-glass"></i></div>
            <input type="text" placeholder="Tìm kiếm khóa học, bài học,..." name="search" id="">
        </div>
        <div class="flex basis-1/3 justify-end mr-7">
            @if (auth()->user())
                <a href="#" class="mr-[20px] flex justify-center items-center">
                    <img class="w-[36px] h-[36px] rounded-full mr-[10px]" src="https://fullstack.edu.vn/assets/f8-icon-lV2rGpF0.png" alt="">
                    <span class="font-bold">{{auth()->user()->name}}</span>
                </a>
            @else
                
            <button class="mr-2">Đăng ký</button>
            <button class="btn rounded-full text-[#fff] bg-[#ff8f26] px-[20px] py-[9px]">Đăng nhập</button>
            @endif
        </div>
    </div>
</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function getCookie(name) {
    let cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='))
        ?.split('=')[1];
    return cookieValue ? decodeURIComponent(cookieValue) : null;
    }
    $.ajax({
        method:'GET',
        url: "/get-profile",
        headers: {
            Authorization: 'Bearer ' + getCookie("token") 
        },
        success: function(data){
            console.log(data);
        }

    })
</script>
