<!-- Footer -->
<footer class="bg-black text-white py-12 mt-12">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10">

        <!-- Logo & Tagline -->
        <div>
            <h2 class="text-2xl font-bold tracking-wide mb-4">
                BloomBox
            </h2>
            <p class="text-amber-200 italic text-sm">
                "Where Every Petal Tells a Story"
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-amber-400">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-amber-400 transition">Home</a></li>
                <li><a href="{{ route('customer.bouquets-index') }}" class="hover:text-amber-400 transition">Shop</a></li>
                <li><a href="#" class="hover:text-amber-400 transition">About Us</a></li>
                <li><a href="#" class="hover:text-amber-400 transition">Contact</a></li>
            </ul>
        </div>

        <!-- Customer Support -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-amber-400">Customer Support</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-amber-400 transition">FAQs</a></li>
                <li><a href="#" class="hover:text-amber-400 transition">Returns & Refunds</a></li>
                <li><a href="#" class="hover:text-amber-400 transition">Shipping Info</a></li>
                <li><a href="#" class="hover:text-amber-400 transition">Track Order</a></li>
            </ul>
        </div>

        <!-- Social & Contact -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-amber-400">Connect With Us</h3>
            <div class="flex space-x-4 text-xl">
                <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p class="mt-4 text-sm text-amber-200">
                📍 Colombo, Sri Lanka <br>
                📞 +94 77 123 4567 <br>
                ✉️ support@bloombox.com
            </p>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-400">
        © {{ date('Y') }} BloomBox. All Rights Reserved.
    </div>
</footer>
