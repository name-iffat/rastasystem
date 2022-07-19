<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Testing</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand"><img class="img-fluid" src="./images/Logo2.png"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./index.php #about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="./menu.php">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="./adminlogin.php">Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="./adminlogin.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container mt-4 px-4 px-lg-5">
                <div class="row gx-0 text-center">
                    <h1>Our Menu</h3>
                </div>
                <div class="row align-items-center">
                    <div class="menu-btns">
                        <button type = "button" class = "menu-btn active-btn" id = "ala-carte">Ala Carte</button>
                        <button type = "button" class = "menu-btn" id = "combo-set">Combo Set</button>
                        <button type = "button" class = "menu-btn" id = "rasta-combo">Rasta Combo</button>
                    </div>
                    <div class = "food-items">
                        <!-- Featured Project Row 1-->
                        <div class="row gx-0 mb-4 mb-lg-5 mt-4 mt-lg-5 align-items-center food-item ala-carte">
                            <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0 rounded-5" src="./images/AyamGunting.png" alt="..."></div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h4>Ayam Gunting - <span>RM 9.00</span></h4>
                                    <p class="mb-0">Description</p>
                                </div>
                            </div>
                        </div>
                        <!-- Project One Row-->
                        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center food-item ala-carte">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sotong.jpg" alt="..." /></div>
                            <div class="col-lg-6">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-left">
                                            <h4 class="text-white">Sotong Gorilla - <span>RM 13.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 ms-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Two Row-->
                        <div class="row gx-0 justify-content-center food-item ala-carte">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sosej.jpg" alt="..." /></div>
                            <div class="col-lg-6 order-lg-first">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-right">
                                            <h4 class="text-white">Sosej Cheese - <span>RM 4.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 me-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Project Row 2-->
                        <div class="row gx-0 mb-4 mb-lg-5 mt-4 mt-lg-5 align-items-center food-item combo-set">
                            <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0 rounded-5" src="./images/AyamGunting.png" alt="..."></div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h4>Ayam Gunting + Sosej Cheese - <span>RM 12.00</span></h4>
                                    <p class="mb-0">Description</p>
                                </div>
                            </div>
                        </div>
                        <!-- Project One Row-->
                        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center food-item combo-set">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sotong.jpg" alt="..." /></div>
                            <div class="col-lg-6">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-left">
                                            <h4 class="text-white">Sotong Gorilla + Sosej Cheese - <span>RM 16.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 ms-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Two Row-->
                        <div class="row gx-0 justify-content-center food-item combo-set">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sosej.jpg" alt="..." /></div>
                            <div class="col-lg-6 order-lg-first">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-right">
                                            <h4 class="text-white">Sosej Cheese(2pcs) - <span>RM 7.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 me-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Project Row 3-->
                        <div class="row gx-0 mb-4 mb-lg-5 mt-4 mt-lg-5 align-items-center food-item rasta-combo">
                            <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0 rounded-5" src="./images/AyamGunting.png" alt="..."></div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h4>Ayam Gunting + Air - <span>RM 20.00</span></h4>
                                    <p class="mb-0">Description</p>
                                </div>
                            </div>
                        </div>
                        <!-- Project One Row-->
                        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center food-item rasta-combo">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sotong.jpg" alt="..." /></div>
                            <div class="col-lg-6">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-left">
                                            <h4 class="text-white">Sotong Gorilla + Air - <span>RM 24.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 ms-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Two Row-->
                        <div class="row gx-0 justify-content-center food-item rasta-combo">
                            <div class="col-lg-6"><img class="img-fluid" src="./images/Sosej.jpg" alt="..." /></div>
                            <div class="col-lg-6 order-lg-first">
                                <div class="menu-bg text-center h-100 project">
                                    <div class="d-flex h-100">
                                        <div class="project-text w-100 my-auto text-center text-lg-right">
                                            <h4 class="text-white">Sosej Cheese + Air - <span>RM 20.00</span></h4>
                                            <p class="mb-0 text-white-50">Description</p>
                                            <hr class="d-none d-lg-block mb-0 me-0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            const menuBtns = document.querySelectorAll('.menu-btn');
            const foodItems = document.querySelectorAll('.food-item');

            let activeBtn = "ala-carte";

            showFoodMenu(activeBtn);

            menuBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    resetActiveBtn();
                    showFoodMenu(btn.id);
                    btn.classList.add('active-btn');
                });
            });

            function resetActiveBtn(){
                menuBtns.forEach((btn) => {
                    btn.classList.remove('active-btn');
                });
            }

            function showFoodMenu(newMenuBtn){
                activeBtn = newMenuBtn;
                foodItems.forEach((item) => {
                    if(item.classList.contains(activeBtn)){
                        item.style.display = "flex";
                    } else {
                        item.style.display = "none";
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>