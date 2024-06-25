// Alumno.ts

import { Persona } from "./Persona";

export class Alumno extends Persona {
    asignatura: string;

    constructor(nombre: string, asignatura: string) {
        super(nombre);
        this.asignatura = asignatura;
    }
}
