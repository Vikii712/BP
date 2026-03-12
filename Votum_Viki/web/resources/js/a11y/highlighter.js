document.addEventListener("DOMContentLoaded", () => {
    const blocks = document.querySelectorAll(".divide-highlight");

    blocks.forEach(block => {
        if(block.dataset.highlighted) return;

        const walker = document.createTreeWalker(block, NodeFilter.SHOW_TEXT);
        const nodes = [];
        while(walker.nextNode()) nodes.push(walker.currentNode);

        nodes.forEach(node => {
            const text = node.nodeValue.trim();
            if(!text) return;

            const fragment = document.createDocumentFragment();
            text.split(/(?<=[.!?])\s+/).forEach(sentence => {
                const span = document.createElement("span");
                span.className = "sentence";
                span.textContent = sentence + " ";
                fragment.appendChild(span);
            });

            node.parentNode.replaceChild(fragment, node);
        });

        block.dataset.highlighted = "true";
    });
});
