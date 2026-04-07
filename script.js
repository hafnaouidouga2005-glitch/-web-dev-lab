document.addEventListener("DOMContentLoaded", function () {

    // زر إضافة مادة
    document.getElementById("addCourse").addEventListener("click", function () {
        let courses = document.getElementById("courses");
        let firstRow = document.querySelector(".course-row");

        let newRow = firstRow.cloneNode(true);

        // تنظيف القيم
        newRow.querySelectorAll("input").forEach(input => input.value = "");

        courses.appendChild(newRow);
    });

    // حذف مادة
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-row")) {
            let rows = document.querySelectorAll(".course-row");

            if (rows.length > 1) {
                e.target.closest(".course-row").remove();
            }
        }
    });

    // حساب GPA (إرسال إلى PHP)
    document.getElementById("gpaForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("calculate.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            let result = document.getElementById("result");

            if (data.success) {
                result.innerHTML = <div style="color: green;">${data.message}</div>;
            } else {
                result.innerHTML = <div style="color: red;">${data.message}</div>;
            }
        })
        .catch(() => {
            document.getElementById("result").innerHTML =
                "<div style='color:red;'>Server Error</div>";
        });
    });

});
