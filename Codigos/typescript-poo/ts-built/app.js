// app.ts
import { Alumno } from "./Alumno";
export function iniciar5() {
    let alumno1 = new Alumno("Juan", "Matemáticas");
    alert(JSON.stringify(alumno1));
}
