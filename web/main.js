


// ------------------------------ Отчет по пользователям -----------------------------------------
const baskets = document.querySelectorAll('#basket');

if (baskets) {
    baskets.forEach(function (basket) {
        basket.addEventListener('click', () => {
            let id_product = price.getAttribute('data-id');

            // console.log(id_product);
            // jQuery.ajax({
            //     type: "GET",
            //     url: "/prices/edit-field",
            //     data: 'id=' + price_id + "&field=" + field + "&value=" + text,
            //     success: function (data) {
            //         let r = JSON.parse(data);
            //             let div = document.createElement('div');
            //             div.className = "notify";
            //             div.innerHTML = r.message;
                      
            //             document.body.append(div);
            //             setTimeout(() => div.remove(), 3000);
            //         // $(content_block).html(datas;
            //         // $('.progress').hide();
        
            //         // if (remark_report) remark_report.classList.remove('op03');
            //     },
            // });
        });
    })
}
