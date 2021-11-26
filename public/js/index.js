// リアルタイムバリデーション
        //Element取得

        //form
        const form = document.getElementById("form");
        //form element
        const first_name = document.getElementById("first_name");
        const last_name = document.getElementById("last_name");
        const email = document.getElementById("email");
        const postcode = document.getElementById("postcode");
        const opinion = document.getElementById("opinion");
        const address = document.getElementById("address");

        //error message
        const first_name_error_message = document.getElementById("first-name-error-message")
        const last_name_error_message = document.getElementById("last-name-error-message")
        const email_error_message = document.getElementById("email-error-message")
        const postcode_error_message = document.getElementById("postcode-error-message")
        const address_error_message = document.getElementById("address-error-message")
        const opinion_error_message = document.getElementById("opinion-error-message")
        //button
        const btn = document.getElementById("btn");

        //バリデーションパターン
        const nameExp = /^[A-Za-zぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠]{1,}$/;
        const emailExp = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        const postcodeExp = /^[0-9]{3}-[0-9]{4}$/;
        const addressExp = /^[^ 　]{1,}$/;
        const opinionExp = /^[^ 　]{1,120}$/;

        //event

        //first_name
        first_name.addEventListener("blur", e => {
            if (nameExp.test(first_name.value)) {
                first_name.setAttribute("class", "success");
                first_name_error_message.style.display = "none";
            } else {
                first_name.setAttribute("class", "error");
                first_name_error_message.style.display = "inline";
            }
            console.log(first_name.getAttribute("class").includes("success"));
            checkSuccess();
        })

        //last_name
        last_name.addEventListener("blur", e => {
            if (nameExp.test(last_name.value)) {
                last_name.setAttribute("class", "success");
                last_name_error_message.style.display = "none";
            } else {
                last_name.setAttribute("class", "error");
                last_name_error_message.style.display = "inline";
            }
            console.log(last_name.getAttribute("class").includes("success"));
            checkSuccess();
        })

        //email
        email.addEventListener("blur", e => {
            if (emailExp.test(email.value)) {
                email.setAttribute("class", "success");
                email_error_message.style.display = "none";
            } else {
                email.setAttribute("class", "error");
                email_error_message.style.display = "inline";
            }
            checkSuccess();
        })

        //postcode
        postcode.addEventListener("blur", e =>{
            function hankaku2Zenkaku(str) {
                return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(postcode) {
                    return String.fromCharCode(postcode.charCodeAt(0) - 0xFEE0);
                });
            }
        })

        postcode.addEventListener("blur", e => {
            if (postcodeExp.test(postcode.value)) {
                postcode.setAttribute("class", "success");
                postcode_error_message.style.display = "none";
            } else {
                postcode.setAttribute("class", "error");
                postcode_error_message.style.display = "inline";
            }
            checkSuccess();
        })

        //address
        address.addEventListener("blur", e => {
            if (addressExp.test(address.value)) {
                address.setAttribute("class", "success");
                address_error_message.style.display = "none";
            } else {
                address.setAttribute("class", "error");
                address_error_message.style.display = "inline";
            }
            checkSuccess();
        })

        //opinion
        opinion.addEventListener("blur", e => {
            if (opinionExp.test(opinion.value)) {
                opinion.setAttribute("class", "success");
                opinion_error_message.style.display = "none";
            } else {
                opinion.setAttribute("class", "error");
                opinion_error_message.style.display = "inline";
            }
            checkSuccess();
        })


// 半角変換
const onlyNumbers = n => {
    return n.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g,'-').replace(/[^\-\d]/g,'');
}