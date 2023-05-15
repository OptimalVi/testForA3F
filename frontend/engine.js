class Engine {
    constructor() {
        this.lines = [];
    }

    init(callback) {
        setTimeout(() => {
            while (this.lines.length < 500) {
                this.lines.push(this.generator());
            }
            setTimeout(callback, 1000);
        }, 1000);
    }

    generator() {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz 0123456789 ';

        for (let i = 0; i < 80; i++) {
            const randomChar = characters.charAt(
                Math.floor(Math.random() * characters.length)
            );
            result += randomChar;
        }

        return result;
    }

    get() {
        return this.lines;
    }
}