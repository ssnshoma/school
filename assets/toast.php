<style>
    #toastBox {
        position: absolute;
        top: 10px;
        left: 30px;
        display: flex;
        align-items: flex-end;
        flex-direction: column;
        overflow: hidden;
        padding: 20px;
        z-index: 3000;
    }

    .toast {
        width: 400px;
        height: 80px;
        background: #fff;
        margin: 15px 0;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        position: relative;
        transform: translateY(-100%);
        opacity: 0.5;
        animation: movetop 0.2s linear forwards;
    }

    @keyframes movetop {
        100% {
            transform: translateY(0);
            opacity: 100%;
        }
    }

    .toast i {
        margin: 0 20px;
        font-size: 35px;
        color: green;
    }

    .toast.error i {
        color: red;
    }

    .toast.invalid i {
        color: orange;
    }

    .toast::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        background: green;
        animation: anim 3s linear forwards;
    }

    .toast.error::after {
        background: red;
    }

    .toast.invalid::after {
        background: orange;
    }

    @keyframes anim {
        100% {
            width: 0;
        }
    }
</style>

<div id="toastBox"></div>
<script>
     
    toastBox = document.getElementById('toastBox');

    function showToast(msg, type) {
        let toast = document.createElement('div');
        toast.classList.add('toast');
        toast.innerHTML = msg;
        toastBox.appendChild(toast);
        if (type == "error") {
            toast.classList.add('error');
        }
        if (type == "warning") {
            toast.classList.add('invalid');
        }
        setTimeout(() => {
            toast.remove()
        }, 3000);
    }
</script>