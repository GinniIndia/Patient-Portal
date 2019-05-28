AOS.init({
                                            duration: 3000
                                        });
                                         var initialSrc = "logo.png";
                                    var scrollSrc = "logo1.png";

                                    $(window).scroll(function () {
                                        var value = $(this).scrollTop();
                                        if (value > 100)
                                            $(".logo").attr("src", scrollSrc);
                                        else
                                            $(".logo").attr("src", initialSrc);
                                    });
                                     window.onscroll = function () {
                                        myFunction()
                                    };

                                    var header = document.getElementById("header");
                                    var sticky = header.offsetTop;

                                    function myFunction() {
                                        if (window.pageYOffset >= sticky) {
                                            header.classList.add("sticky");
                                        } else {
                                            header.classList.remove("sticky");
                                        }
                                    }
                                     // When the user scrolls down 20px from the top of the document, show the button
                                    window.onscroll = function () {
                                        scrollFunction()
                                    };

                                    function scrollFunction() {
                                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                            document.getElementById("myBtn").style.display = "block";
                                        } else {
                                            document.getElementById("myBtn").style.display = "none";
                                        }
                                    }

                                    // When the user clicks on the button, scroll to the top of the document
                                    function topFunction() {
                                        document.body.scrollTop = 0;
                                        document.documentElement.scrollTop = 0;
                                    }