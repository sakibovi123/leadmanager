@include("base")

<div class="container mx-auto flex">
    @include("sidebar")

    <div class="main-content px-7 py-5">
        <div class="flex items-center justify-between border border-radius-xl bg-white h-[120px] w-[1400px] rounded">
            <div class="content-1">
                <div class="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                    <h1 class="text-center font-bold">TOTAL LEADS</h1>
                    <p class="text-center">{{ $leads->count() }}</p>
                </div>
            </div>
            <div class="content-1">
                <div class="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                    <h1 class="text-center">Total Ping</h1>
                    <p class="text-center">233</p>
                </div>
            </div>
            <div class="content-1">
                <div class="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                    <h1 class="text-center">Total Ping</h1>
                    <p class="text-center">233</p>
                </div>
            </div>
            <div class="content-1">
                <div class="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                    <h1 class="text-center">Total Ping</h1>
                    <p class="text-center">233</p>
                </div>
            </div>
        </div>
        <br><br><br>
        <h1 class="text-2xl font-bold py-3">RECENT STRIKES</h1>
        <table class="w-[1400px] border-2 p-5 table-auto shadow-xl rounded-xl py-4">
            <thead>
                <tr class="text-center border-b-2 bg-slate-900 text-white">
                    <th class="text-md p-3">Strike Date</th>
                    <th class="text-md p-3">Campaign</th>
                    <th class="text-md p-3">First Name</th>
                    <th class="text-md p-3">Last Name</th>
                    <th class="text-md p-3">Email</th>
                    <th class="text-md p-3">Phone</th>
                    
                </tr>
            </thead>
            <tbody>
                @if($leads->count() > 0)
                @foreach($leads as $lead)
                <tr class="bg-white hover:bg-indigo-100 p-3 cursor-pointer transition-all delay-50 ease-in-out hover:translate-x-1 hover:scale-200 border" key={lead.id}>
                    <td class="text-center p-3">{{$lead->created_at}}</td>
                    <td class="text-center p-3">{{$lead->campaign->campaign_title}}</td>
                    <td class="text-center p-3">{{$lead->first_name}}</td>
                    <td class="text-center p-3">{{$lead->last_name}}</td>
                    <td class="text-center p-3">{{$lead->email}}</td>
                    <td class="text-center p-3">{{$lead->phone}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
          
        </table>
    </div>
</div>

