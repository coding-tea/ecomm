<?php
$profile = 'profile.php';
$commande = 'commande.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'contact us';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "cart.php";
require_once 'header.php';
?>
<section id="contact">
    <h1 class="heading">contact us</h1>
    <div class="h-screen w-full grid place-items-center bg-slate-100">
        <div class="bg-white rounded-md shadow-md flex flex-row">
            <!-- contact information form -->
            <div class="bg-blue-800 p-8 md:hover:scale-y-110 rounded-md transition md:block" id="contact_info">
                <div class="flex justify-between">
                    <h2 class="text-white text-xl">Contact Information</h2>
                    <h2 class="text-white text-xs flex flex-row md:hidden block cursor-pointer" id="swtich_to_contact_us">Contact Us <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg></h2>
                </div>
                <div class="mt-6 flex flex-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-200 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-slate-200 text-xs">Name :</h2>
                        <p class="text-white text-xs">Ecommerce-Web</p>
                    </div>
                </div>

                <div class="mt-4 flex flex-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-200 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-slate-200 text-xs">Email :</h2>
                        <p class="text-white text-xs">ecommerce-web@gmail.com</p>
                    </div>
                </div>

                <div class="mt-4 flex flex-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-200 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-slate-200 text-xs">Phone :</h2>
                        <p class="text-white text-xs">06-06-06-06-06</p>
                    </div>
                </div>

                <div class="mt-5 flex flex-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-200 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-slate-200 text-xs">Address :</h2>
                        <p class="text-white text-xs">429, Hay Adarissa, Rte Ain Chqef, Fes 30040</p>
                    </div>
                </div>

            </div>


            <!-- get in touch form -->
            <div class="px-8 py-8" id="contact_us">
                <div class="flex justify-between">
                    <h2 class="text-blue-800 text-xl">Get In Touch</h2>
                    <h2 class="text-red-800 text-xs flex flex-row md:hidden block cursor-pointer" id="swtich_to_contact_info">Contact Info <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg></h2>
                </div>
                <form action="mailto:ig.looveawm@gmail.com">
                    <input type="text" placeholder="Enter Your Name" class="w-full text-xs px-3 h-8 my-2 outline-none rounded-md border focus:shadow-sm" required><br>
                    <input type="email" placeholder="Enter Your Email" class="w-full text-xs px-3 h-8 my-2 outline-none rounded-md border focus:shadow-sm" required><br>
                    <input type="text" placeholder="Subject" class="w-full text-xs px-3 h-8 my-2 outline-none rounded-md border focus:shadow-sm" required><br>
                    <textarea placeholder="Enter your Message here" class="w-full text-xs px-3 py-2 h-20 my-2 outline-none rounded-md border focus:shadow-sm resize-none" required></textarea><br>
                    <input type="submit" value="Send" class="bg-blue-800 px-4 py-2 rounded-md text-white text-xs cursor-pointer hover:shadow-md">
                </form>
            </div>

        </div>
    </div>

</section>

<script>
    let contact_info = document.querySelector('#contact_info');
    let contact_us = document.querySelector('#contact_us');
    let swtich_to_contact_us = document.querySelector('#swtich_to_contact_us');
    let swtich_to_contact_info = document.querySelector('#swtich_to_contact_info');

    swtich_to_contact_us.addEventListener("click", () => {
        contact_info.style.display = 'none';
        contact_us.style.display = 'block';
    });

    swtich_to_contact_info.addEventListener("click", () => {
        contact_info.style.display = 'block';
        contact_us.style.display = 'none';
    });
</script>

<?php
require_once 'footer.php';
?>