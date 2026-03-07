let highlightInitialized = false;

window.highlightReading = function(active){

    const blocks = document.querySelectorAll(".divide-highlight");

    if(active){

        document.body.classList.add("highlight-reading");

        if(!highlightInitialized){

            blocks.forEach(block => {

                const walker = document.createTreeWalker(
                    block,
                    NodeFilter.SHOW_TEXT,
                    null,
                    false
                );

                const nodes = [];

                while(walker.nextNode()){
                    nodes.push(walker.currentNode);
                }

                nodes.forEach(node => {

                    const text = node.nodeValue;

                    if(!text || !text.trim()) return;

                    const sentences = text.split(/(?<=[.!?])\s+/);

                    const fragment = document.createDocumentFragment();

                    sentences.forEach(sentence => {

                        const clean = sentence.trim();
                        if(!clean) return;

                        const span = document.createElement("span");
                        span.className = "sentence";
                        span.textContent = clean + " ";

                        fragment.appendChild(span);

                    });

                    if(fragment.childNodes.length){
                        node.parentNode.replaceChild(fragment, node);
                    }

                });

            });

            highlightInitialized = true;
        }

    } else {

        document.body.classList.remove("highlight-reading");

    }

}
