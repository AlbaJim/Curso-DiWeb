// Ejemplo-02-TS-POO-Vehiculo.ts

// Clase padre
export class Vehiculo {
    marca: string = ""
    constructor(marca: string) {
        this.marca = marca
    }
    
    imprimir()  {
        return {
            "Marca" : this.marca
        }
    }
}