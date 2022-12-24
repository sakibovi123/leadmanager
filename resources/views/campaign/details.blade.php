@include("base")

<div class="container mx-auto flex">
    @include("sidebar")

    <div class="main-content px-7 py-5">
        <div class="upper-section bg-gray-100 border rounded p-3 w-[1300px] shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold">{{ $camp->campaign_title ?? 'No Title Found' }}</h3>
                <div class="flex items-center justify-center">
                    <a href="" class="border p-1.5 rounded hover:bg-gray-400 transition delay-75">Supplier API docs</a>
                    <a href="" class="px-3">All campaigns</a>
                </div>
                
            </div>
        </div>
        <br><br>
        <div class="section-2 w-[1300px] bg-gray-50 border rounded p-3">
            <h1 class="font-semibold text-xl">Campaign Details</h1>
            
            <hr class="my-2.5">

            

        </div>

    </div>

</div>