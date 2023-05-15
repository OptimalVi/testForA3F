window.addEventListener('load', function () {

    const engine = new Engine();
    const list = document.querySelector('.list');
    const startButton = document.querySelector('.startButton');
    const endButton = document.querySelector('.endButton');
    const gotoLineButton = document.querySelector('.gotoLineButton');
    const gotoLineInput = document.querySelector('.gotoLineInput');

    engine.init(
        () => engine.get().forEach(line => {
            const listItem = document.createElement('li');
            listItem.classList.add('listItem');
            listItem.textContent = line;
            list.appendChild(listItem);
        })
    );

    startButton.addEventListener('click', target => {
        list.firstChild.scrollIntoView({ behavior: 'smooth' });
    });
    endButton.addEventListener('click', target => {
        list.firstChild.scrollIntoView({ behavior: 'smooth' });
    });
    gotoLineButton.addEventListener('click', target => {
        const inputValue = Number(gotoLineInput.value);
        if (list.children[inputValue]) {
            list.children[inputValue].scrollIntoView({ behavior: 'smooth' });
        }
    })
})