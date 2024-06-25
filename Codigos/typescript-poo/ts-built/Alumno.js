// Alumno.ts
import { Persona } from "./Persona";
export class Alumno extends Persona {
    constructor(nombre, asignatura) {
        super(nombre);
        this.asignatura = asignatura;
    }
}
