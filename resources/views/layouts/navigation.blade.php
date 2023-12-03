<section class="bg-white">
    <div class="px-6 lg:px-12 py-6">
        <nav class="flex justify-between">
            <div class="flex w-full items-center">
                <a href="{{ route('dashboard') }}">
                    Laravel CRUD
                </a>
                <ul class="hidden xl:flex px-4 ml-14 2xl:ml-40 mr-auto">
                    <li class="mr-8 2xl:mr-14">
                        <a class="flex items-center font-heading font-medium hover:text-darkBlueGray-400" href="{{ route('dashboard') }}">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 21V11h8v10h-8zM3 13V3h8v10H3zm6-2V5H5v6h4zM3 21v-6h8v6H3zm2-2h4v-2H5v2zm10 0h4v-6h-4v6zM13 3h8v6h-8V3zm2 2v2h4V5h-4z"/></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->isAdmin())
                        <li class="mr-8 2xl:mr-14">
                            <a href="{{ route('offers.index') }}" class="flex items-center font-heading font-medium hover:text-darkBlueGray-400">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M20.083 15.2l1.202.721a.5.5 0 0 1 0 .858l-8.77 5.262a1 1 0 0 1-1.03 0l-8.77-5.262a.5.5 0 0 1 0-.858l1.202-.721L12 20.05l8.083-4.85zm0-4.7l1.202.721a.5.5 0 0 1 0 .858L12 17.65l-9.285-5.571a.5.5 0 0 1 0-.858l1.202-.721L12 15.35l8.083-4.85zm-7.569-9.191l8.771 5.262a.5.5 0 0 1 0 .858L12 13 2.715 7.429a.5.5 0 0 1 0-.858l8.77-5.262a1 1 0 0 1 1.03 0zM12 3.332L5.887 7 12 10.668 18.113 7 12 3.332z"/></svg>
                                <span>Offers</span>
                            </a>
                        </li>
                    @else
                        <li class="mr-8 2xl:mr-14">
                            <a href="{{ route('offers.my') }}" class="flex items-center font-heading font-medium hover:text-darkBlueGray-400">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M20.083 15.2l1.202.721a.5.5 0 0 1 0 .858l-8.77 5.262a1 1 0 0 1-1.03 0l-8.77-5.262a.5.5 0 0 1 0-.858l1.202-.721L12 20.05l8.083-4.85zm0-4.7l1.202.721a.5.5 0 0 1 0 .858L12 17.65l-9.285-5.571a.5.5 0 0 1 0-.858l1.202-.721L12 15.35l8.083-4.85zm-7.569-9.191l8.771 5.262a.5.5 0 0 1 0 .858L12 13 2.715 7.429a.5.5 0 0 1 0-.858l8.77-5.262a1 1 0 0 1 1.03 0zM12 3.332L5.887 7 12 10.668 18.113 7 12 3.332z"/></svg>
                                <span>My offers</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</section>
