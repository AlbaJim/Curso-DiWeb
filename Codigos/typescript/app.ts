// app.ts

import { Alumno } from "./Alumno";

export function iniciar3(): void {
    let alumno = new Alumno("Juan", "Matemáticas");
    console.log(alumno);
}
