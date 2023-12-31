import "./bootstrap";
import "flowbite";

try {
    var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
    );

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon.classList.remove("hidden");
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
    }

    var themeToggleBtn = document.getElementById("theme-toggle");

    themeToggleBtn.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
    try {
        // currency

        document.addEventListener("DOMContentLoaded", function () {
            formatCurrency();
        });

        function formatCurrency() {
            // Mendapatkan semua elemen dengan class "currency"
            var currencyElements = document.querySelectorAll(".currency");

            // Mengubah setiap elemen dengan class "currency"
            currencyElements.forEach(function (element) {
                var value = parseFloat(
                    element.textContent.replace(/[^0-9.-]+/g, "")
                ); // Mengambil nilai numerik
                var formattedValue = formatRupiah(value); // Mengubah nilai menjadi format Rupiah

                // Menetapkan teks yang sudah diformat ke dalam elemen
                element.textContent = formattedValue;
            });
        }

        function formatRupiah(value) {
            var formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(value);
        }
    } catch (currencyFormattingError) {
        console.error(
            "Error in currency formatting block:",
            currencyFormattingError
        );
    }

    try {
        // Function to navigate back
        function goBack() {
            window.history.back();
        }

        // Add event listener when DOM content is loaded
        document.addEventListener("DOMContentLoaded", function () {
            // Find the "Batal" button
            var cancelButton = document.getElementById("cancelButton");

            // Add click event listener
            cancelButton.addEventListener("click", function () {
                goBack();
            });
        });
    } catch (backButtonError) {
        console.error("Error back button:", backButtonError);
    }

    try {
        //  batal edit button (penyewa.akun)

        const editButton = document.getElementById("editkah");
        const isEditPw = document.getElementById("isEditPw");
        const editPw = document.getElementById("editPw");
        const formInputs = document.querySelectorAll("input");
        const submitButton = document.createElement("button");

        editButton.addEventListener("click", () => {
            formInputs.forEach((input) => {
                input.removeAttribute("readonly");
            });

            isEditPw.classList.remove("hidden");
            isEditPw.classList.add("block");

            submitButton.type = "submit";
            submitButton.textContent = "Simpan Perubahan";
            submitButton.classList.add(
                "text-blue-700",
                "hover:text-white",
                "border",
                "border-blue-700",
                "hover:bg-blue-800",
                "focus:ring-4",
                "focus:outline-none",
                "focus:ring-blue-300",
                "font-medium",
                "rounded-lg",
                "text-sm",
                "px-5",
                "py-2.5",
                "text-center",
                "me-2",
                "mb-2",
                "dark:border-blue-500",
                "dark:text-blue-500",
                "dark:hover:text-white",
                "dark:hover:bg-blue-500",
                "dark:focus:ring-blue-800"
            );

            editButton.parentNode.insertBefore(
                submitButton,
                editButton.nextSibling
            );

            editButton.style.display = "none";

            const batalButton = document.createElement("button");
            batalButton.type = "button";
            batalButton.textContent = "Batal";
            batalButton.classList.add(
                "text-gray-500",
                "hover:text-gray-700",
                "border",
                "border-gray-300",
                "hover:bg-gray-200",
                "focus:ring-4",
                "focus:outline-none",
                "focus:ring-blue-300",
                "font-medium",
                "rounded-lg",
                "text-sm",
                "px-5",
                "py-2.5",
                "text-center",
                "me-2",
                "mb-2",
                "dark:border-gray-500",
                "dark:text-gray-500",
                "dark:hover:text-gray-700",
                "dark:hover:bg-gray-200",
                "dark:focus:ring-blue-800"
            );

            isEditPw.addEventListener("click", () => {
                editPw.classList.remove("hidden");
                editPw.classList.add("block");
            });
            batalButton.addEventListener("click", () => {
                formInputs.forEach((input) => {
                    input.setAttribute("readonly", true);
                });

                submitButton.parentNode.removeChild(submitButton);

                editPw.classList.remove("block");
                editPw.classList.add("hidden");

                isEditPw.classList.remove("block");
                isEditPw.classList.add("hidden");
                editButton.style.display = "block";

                const lastChild = editButton.parentNode.lastElementChild;
                if (lastChild === batalButton) {
                    editButton.parentNode.removeChild(batalButton);
                }
            });

            editButton.parentNode.appendChild(batalButton);
        });
    } catch (editButtonError) {
        console.error("Error in edit button block:", editButtonError);
    }
    try {
        // tampil password bagian akun setting
        const oldPasswordField = document.getElementById("old_password");
        const newPasswordField = document.getElementById("new_password");

        const toggleOldPasswordButton = document.getElementById("showPw");
        toggleOldPasswordButton.addEventListener("click", () => {
            if (oldPasswordField.type === "password") {
                oldPasswordField.type = "text";
                newPasswordField.type = "text";
                toggleOldPasswordButton.textContent = "Sembunyikan Password";
            } else {
                oldPasswordField.type = "password";
                newPasswordField.type = "password";
                toggleOldPasswordButton.textContent = "Lihat Password";
            }
        });
    } catch (passwordShowError) {
        console.error("Error tampilkan edit password:", passwordShowError);
    }
    try {
        /// upload image ke pihak ke tiga

        const files = document.querySelectorAll("#foto_kamar");
        const url = document.querySelectorAll(".urlimg");
        const notif = document.querySelectorAll(".notifs");
        const waitsubmit = document.querySelectorAll(".waitsubmit");

        files.forEach((file) => {
            file.addEventListener("change", (ev) => {
                const formData = new FormData();
                formData.append("image", ev.target.files[0]);

                notif.forEach((urlElement) => {
                    urlElement.textContent = "Gambar sedang diupload...";
                });

                waitsubmit.forEach((urlElement) => {
                    urlElement.disabled = true;
                });

                fetch("https://api.imgur.com/3/image/", {
                    method: "post",
                    headers: {
                        Authorization: `Client-ID ${window.imgurClientId}`,
                    },
                    body: formData,
                })
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.success) {
                            url.forEach((urlElement) => {
                                urlElement.value = data.data.link;
                            });
                            notif.forEach((urlElement) => {
                                urlElement.textContent = "Berhasil diupload.";
                            });
                            waitsubmit.forEach((urlElement) => {
                                urlElement.disabled = false;
                            });
                        } else {
                            console.error("Error uploading image:", data.error);
                            notif.forEach((urlElement) => {
                                urlElement.textContent =
                                    "Gagal mengupload gambar.";
                            });
                            waitsubmit.forEach((urlElement) => {
                                urlElement.disabled = true;
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Error uploading image:", error);
                        notif.forEach((urlElement) => {
                            urlElement.textContent = "Gagal mengupload gambar.";
                        });
                        waitsubmit.forEach((urlElement) => {
                            urlElement.disabled = true;
                        });
                    });
            });
        });
    } catch (imageUploadError) {
        console.error("Error in image kamar upload block:", imageUploadError);
    }
    try {
        /// upload image ke pihak ke tiga

        const files = document.querySelectorAll("#foto_pengajuan");
        const url = document.querySelectorAll(".urlimg");
        const notif = document.querySelectorAll(".notifs");
        const waitsubmit = document.querySelectorAll(".waitsubmit");

        files.forEach((file) => {
            file.addEventListener("change", (ev) => {
                const formData = new FormData();
                formData.append("image", ev.target.files[0]);

                notif.forEach((urlElement) => {
                    urlElement.textContent = "Gambar sedang diupload...";
                });

                waitsubmit.forEach((urlElement) => {
                    urlElement.disabled = true;
                });

                fetch("https://api.imgur.com/3/image/", {
                    method: "post",
                    headers: {
                        Authorization: `Client-ID ${window.imgurClientId}`,
                    },
                    body: formData,
                })
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.success) {
                            url.forEach((urlElement) => {
                                urlElement.value = data.data.link;
                            });
                            notif.forEach((urlElement) => {
                                urlElement.textContent = "Berhasil diupload.";
                            });
                            waitsubmit.forEach((urlElement) => {
                                urlElement.disabled = false;
                            });
                        } else {
                            console.error("Error uploading image:", data.error);
                            notif.forEach((urlElement) => {
                                urlElement.textContent =
                                    "Gagal mengupload gambar.";
                            });
                            waitsubmit.forEach((urlElement) => {
                                urlElement.disabled = true;
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Error uploading image:", error);
                        notif.forEach((urlElement) => {
                            urlElement.textContent = "Gagal mengupload gambar.";
                        });
                        waitsubmit.forEach((urlElement) => {
                            urlElement.disabled = true;
                        });
                    });
            });
        });
    } catch (imageUploadError) {
        console.error(
            "Error in image pengajuan upload block:",
            imageUploadError
        );
    }
} catch (darktoggleError) {
    console.error("Toggle darkmode script error:", darktoggleError);
}
