// Ejemplo-02-TS-POO-Vehiculo.ts
// Clase padre
export class Vehiculo {
    constructor(marca) {
        this.marca = "";
        this.marca = marca;
    }
    imprimir() {
        return {
            "Marca": this.marca
        };
    }
}
