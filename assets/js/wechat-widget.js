document.addEventListener("DOMContentLoaded", () => {
    const chatBox = document.getElementById("chat-box");
    const chatHeader = document.getElementById("chat-header");
    const chatContent = document.getElementById("chat-content");
    const messageInput = document.getElementById("message-input");
    const closeBtn = document.getElementById("close-btn");
    const chatIcon = document.getElementById("chat-icon");
    const copyBtn = document.getElementById("copy-wechat");
    const wechatId = document.getElementById("wechat-id").innerText;

    let shown = false;

    const toggleChat = (open) => {
        chatIcon.style.display = open ? "none" : "flex";
        chatBox.style.display = open ? "flex" : "none";
        messageInput.style.display = open ? "flex" : "none";

        if (open && !shown) {
            const typing = document.createElement("div");
            typing.className = "typing-indicator";
            typing.innerHTML = "<span></span><span></span><span></span>";
            chatContent.appendChild(typing);

            setTimeout(() => {
                typing.remove();
                const msg = document.createElement("div");
                msg.className = "message";
                msg.textContent =
                    "欢迎来到 Explore Vacations! 请扫描二维码或复制微信号,与我们联系定制您的斯里兰卡之旅 ✨";
                chatContent.appendChild(msg);
                shown = true;
            }, 1000);
        }
    };

    chatIcon.onclick = () => toggleChat(true);
    closeBtn.onclick = () => toggleChat(false);

    copyBtn.onclick = () => {
        navigator.clipboard.writeText(wechatId).then(() => {
            copyBtn.innerText = "已复制 ✔";
            setTimeout(() => (copyBtn.innerText = "复制微信号"), 2000);
        });
    };
});
