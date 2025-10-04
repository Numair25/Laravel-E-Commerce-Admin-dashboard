<x-frontend-layout>
    <!-- Alpine.js for carousel and timers -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Top Navigation Bar (if not already present in layout) -->
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex items-center gap-4">
                <span class="text-2xl font-bold text-primary">E-commerce</span>
                <div class="hidden md:flex gap-4 ml-8">
                    <a href="{{ route('cycles.index') }}" class="text-gray-700 hover:text-primary font-medium">Cycles</a>
                    <a href="{{ route('fashions.index') }}" class="text-gray-700 hover:text-secondary font-medium">Fashions</a>
                    <a href="#deals" class="text-gray-700 hover:text-primary font-medium">Deals</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-primary font-medium">Contact</a>
                </div>
            </div>
            <div class="flex-1 mx-8">
                <input type="text" placeholder="Search for products, brands and more..." class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="text-gray-700 hover:text-primary font-medium">Account</a>
                <a href="#" class="text-gray-700 hover:text-primary font-medium">Cart (0)</a>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    <div class="w-full bg-gradient-to-br from-primary/10 to-secondary/10 py-6">
        <div class="max-w-7xl mx-auto relative" x-data="{ slide: 0, slides: [
            {img: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80', title: 'Mega Sale on Cycles!', desc: 'Up to 40% off on top brands. Limited time only.', cta: 'Shop Cycles', link: '#', color: 'from-primary to-accent'},
            {img: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=900&q=80', title: 'New Fashions Arrived!', desc: 'Trendy styles for every season.', cta: 'Shop Fashions', link: '#', color: 'from-secondary to-primary'},
            {img: 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=900&q=80', title: 'Kids Collection', desc: 'Cycles & clothes for all ages.', cta: 'Explore Kids', link: '#', color: 'from-accent to-primary'}
        ], next() { this.slide = (this.slide+1)%this.slides.length }, prev() { this.slide = (this.slide+this.slides.length-1)%this.slides.length }, auto() { setInterval(()=>this.next(), 5000) } }" x-init="auto()">
            <template x-for="(s, i) in slides" :key="i">
                <div x-show="slide === i" class="relative rounded-2xl overflow-hidden h-64 md:h-80 transition-all duration-700">
                    <img :src="s.img" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
                    <div :class="'absolute inset-0 bg-gradient-to-r ' + s.color + ' opacity-80'" ></div>
                    <div class="relative z-10 flex flex-col justify-center items-start h-full px-8 md:px-16">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-2 drop-shadow"> <span x-text="s.title"></span> </h2>
                        <p class="text-lg text-white mb-4 drop-shadow"><span x-text="s.desc"></span></p>
                        <a :href="s.link" class="inline-block px-6 py-2 bg-white text-primary font-bold rounded shadow hover:bg-primary/10"> <span x-text="s.cta"></span> </a>
                    </div>
                </div>
            </template>
            <button @click="prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow z-20"><svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg></button>
            <button @click="next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow z-20"><svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></button>
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                <template x-for="(s, i) in slides" :key="i">
                    <button @click="slide = i" :class="{'bg-white': slide===i, 'bg-white/50': slide!==i}" class="w-3 h-3 rounded-full border border-white"></button>
                </template>
            </div>
        </div>
    </div>

    <!-- Category Grid -->
    <div class="max-w-7xl mx-auto mt-10 px-4">
        <h2 class="text-xl font-bold mb-4">Shop by Category</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-primary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
                <span class="font-medium group-hover:text-primary">Mountain Bikes</span>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-secondary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8"/></svg></span>
                <span class="font-medium group-hover:text-secondary">Men's Fashion</span>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-primary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="4"/></svg></span>
                <span class="font-medium group-hover:text-primary">Electric Bikes</span>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-secondary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg></span>
                <span class="font-medium group-hover:text-secondary">Women's Fashion</span>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-primary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/></svg></span>
                <span class="font-medium group-hover:text-primary">Kids Cycles</span>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow p-4 hover:scale-105 hover:shadow-xl transition cursor-pointer group">
                <span class="bg-secondary/10 p-3 rounded-full mb-2"><svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="4"/></svg></span>
                <span class="font-medium group-hover:text-secondary">Kids Fashion</span>
            </div>
        </div>
    </div>

    <!-- Product Carousels -->
    <div class="max-w-7xl mx-auto mt-12 px-4">
        <h2 class="text-xl font-bold mb-4">Featured Cycles</h2>
        <div class="relative" x-data="{ scroll: $refs.cycleScroll }">
            <button @click="$refs.cycleScroll.scrollLeft -= 300" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-primary/10 rounded-full p-2 shadow"><svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg></button>
            <div class="flex overflow-x-auto gap-6 pb-4 no-scrollbar" x-ref="cycleScroll">
                @foreach($featuredCycles as $cycle)
                <div class="min-w-[220px] bg-white rounded-lg shadow p-4 flex flex-col items-center hover:shadow-xl transition relative group">
                    <a href="{{ route('cycles.show', $cycle) }}">
                        @if($cycle->getFirstMediaUrl('images'))
                            <img src="{{ $cycle->getFirstMediaUrl('images') }}" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $cycle->name }}">
                        @else
                            <img src="/storage/download.jfif" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $cycle->name }}">
                        @endif
                    </a>
                    @if($loop->index % 2 == 0)
                        <span class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">Best Seller</span>
                    @endif
                    <span class="font-bold text-primary mb-1">{{ $cycle->name }}</span>
                    <span class="text-gray-500 text-sm mb-2">{{ $cycle->brand }}</span>
                    <span class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.049 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <span>4.{{ ($loop->index % 5) + 1 }}</span>
                    </span>
                    <span class="text-lg font-bold text-primary mb-2">₹{{ number_format($cycle->price) }}</span>
                    <div class="flex gap-2 w-full opacity-0 group-hover:opacity-100 transition">
                        <button class="flex-1 px-2 py-1 bg-primary text-white rounded hover:bg-secondary text-xs">Add to Cart</button>
                        <button class="flex-1 px-2 py-1 bg-gray-200 text-primary rounded hover:bg-primary/10 text-xs">Wishlist</button>
                    </div>
                </div>
                @endforeach
            </div>
            <button @click="$refs.cycleScroll.scrollLeft += 300" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-primary/10 rounded-full p-2 shadow"><svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></button>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-12 px-4">
        <h2 class="text-xl font-bold mb-4">Featured Fashions</h2>
        <div class="relative" x-data="{ scroll: $refs.fashionScroll }">
            <button @click="$refs.fashionScroll.scrollLeft -= 300" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-secondary/10 rounded-full p-2 shadow"><svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg></button>
            <div class="flex overflow-x-auto gap-6 pb-4 no-scrollbar" x-ref="fashionScroll">
                @foreach($featuredFashions as $fashion)
                <div class="min-w-[220px] bg-white rounded-lg shadow p-4 flex flex-col items-center hover:shadow-xl transition relative group">
                    <a href="{{ route('fashions.show', $fashion) }}">
                        @if($fashion->image)
                            <img src="{{ $fashion->image }}" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $fashion->name }}">
                        @else
                            <img src="/storage/download.jfif" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $fashion->name }}">
                        @endif
                    </a>
                    @if($loop->index % 3 == 0)
                        <span class="absolute top-2 left-2 bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                    @endif
                    <span class="font-bold text-secondary mb-1">{{ $fashion->name }}</span>
                    <span class="text-gray-500 text-sm mb-2">Fashion</span>
                    <span class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.049 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <span>4.{{ ($loop->index % 5) + 1 }}</span>
                    </span>
                    <span class="text-lg font-bold text-secondary mb-2">₹{{ number_format($fashion->price) }}</span>
                    <div class="flex gap-2 w-full opacity-0 group-hover:opacity-100 transition">
                        <button class="flex-1 px-2 py-1 bg-secondary text-white rounded hover:bg-primary text-xs">Add to Cart</button>
                        <button class="flex-1 px-2 py-1 bg-gray-200 text-secondary rounded hover:bg-secondary/10 text-xs">Wishlist</button>
                    </div>
                </div>
                @endforeach
            </div>
            <button @click="$refs.fashionScroll.scrollLeft += 300" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-secondary/10 rounded-full p-2 shadow"><svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></button>
        </div>
    </div>

    <!-- Deals/Offers Section -->
    <div class="max-w-7xl mx-auto mt-12 px-4" id="deals">
        <h2 class="text-xl font-bold mb-4">Today's Deals & Offers</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @for($i = 1; $i <= 4; $i++)
            <div class="bg-gradient-to-br from-secondary/10 to-primary/10 rounded-xl shadow-lg p-6 flex flex-col items-center relative" x-data="{ time: 3600 - $i*600, tick() { if(this.time>0){ setInterval(()=>this.time--,1000) } } }" x-init="tick()">
                <span class="text-2xl font-bold text-primary mb-2">Deal {{ $i }}</span>
                <p class="text-gray-700 mb-2">Save up to {{ 10 + $i * 5 }}% on select items!</p>
                <div class="mb-4 flex items-center gap-1 text-xs text-gray-600">
                    <svg class="w-4 h-4 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
                    <span x-text="Math.floor(time/60)+'m '+(time%60)+'s left'"></span>
                </div>
                <a href="#" class="px-4 py-2 bg-primary text-white rounded hover:bg-secondary font-bold">Shop Deal</a>
                <span class="absolute top-2 right-2 bg-primary text-white text-xs px-2 py-1 rounded">Limited</span>
            </div>
            @endfor
        </div>
    </div>

    <!-- Newsletter Signup & Footer -->
    <footer class="bg-gray-900 mt-16 text-gray-300">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-5 gap-8">
            <div class="md:col-span-2">
                <h3 class="text-lg font-bold text-white mb-4">E-commerce</h3>
                <p class="mb-4 text-gray-400">Your trusted partner for premium cycles and readymade fashions in India. We offer a wide range of cycles and clothes for all ages.</p>
                <div class="flex gap-4 mt-2">
                    <a href="#" class="hover:text-white"><svg class="w-6 h-6 text-gray-400 hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7a1 1 0 00-1 1v4a1 1 0 001 1h3v7a1 1 0 001 1h4a1 1 0 001-1v-7h2.586a1 1 0 00.707-1.707l-7-7A1 1 0 0012 2z"/></svg></a>
                    <a href="#" class="hover:text-white"><svg class="w-6 h-6 text-gray-400 hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.93 9.93 0 01-2.828.775A4.932 4.932 0 0023.337 3.1a9.864 9.864 0 01-3.127 1.195A4.916 4.916 0 0016.616 2c-2.73 0-4.942 2.21-4.942 4.932 0 .386.045.762.127 1.124C7.728 7.89 4.1 6.13 1.671 3.149a4.822 4.822 0 00-.666 2.475c0 1.708.87 3.216 2.188 4.099A4.904 4.904 0 01.964 8.1v.062a4.936 4.936 0 003.95 4.827 4.996 4.996 0 01-2.212.084 4.936 4.936 0 004.604 3.417A9.867 9.867 0 010 21.543a13.94 13.94 0 007.548 2.209c9.057 0 14.009-7.496 14.009-13.986 0-.213-.005-.425-.014-.636A9.936 9.936 0 0024 4.557z"/></svg></a>
                    <a href="#" class="hover:text-white"><svg class="w-6 h-6 text-gray-400 hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184C18.403 2.403 16.946 2 15.5 2c-1.447 0-2.904.403-4.115 1.184C9.403 2.403 7.946 2 6.5 2 5.053 2 3.596 2.403 2.385 3.184A7.963 7.963 0 000 8c0 2.21.896 4.21 2.385 5.816C3.596 15.597 5.053 16 6.5 16c1.447 0 2.904-.403 4.115-1.184C14.597 15.597 16.054 16 17.5 16c1.447 0 2.904-.403 4.115-1.184A7.963 7.963 0 0024 8c0-2.21-.896-4.21-2.385-5.816z"/></svg></a>
                </div>
            </div>
            <div>
                <h4 class="text-md font-semibold mb-2 text-white">Categories</h4>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-white text-gray-300">Cycles</a></li>
                    <li><a href="#" class="hover:text-white text-gray-300">Fashions</a></li>
                    <li><a href="#" class="hover:text-white text-gray-300">Deals</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-md font-semibold mb-2 text-white">Support</h4>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-white text-gray-300">Contact</a></li>
                    <li><a href="#" class="hover:text-white text-gray-300">Returns</a></li>
                    <li><a href="#" class="hover:text-white text-gray-300">FAQ</a></li>
                </ul>
            </div>
            <div class="md:col-span-1">
                <h4 class="text-md font-semibold mb-2 text-white">Newsletter</h4>
                <form class="flex flex-col gap-2">
                    <input type="email" placeholder="Your email address" class="px-3 py-2 rounded bg-gray-800 text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary">
                    <button type="submit" class="bg-primary hover:bg-secondary text-white rounded px-3 py-2 font-semibold">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="text-center text-gray-500 py-4 border-t border-gray-800">© {{ date('Y') }} E-commerce. All rights reserved. Aland, Karnataka, India.</div>
    </footer>
</x-frontend-layout>
