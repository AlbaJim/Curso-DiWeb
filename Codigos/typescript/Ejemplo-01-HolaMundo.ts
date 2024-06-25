// Ejemplo-01-HolaMundo.ts
function principal(): void {
    alert(hola("Hola"));
}

function hola(mensaje:string): string {
    let sufijo: string = " mundo";
    return mensaje + sufijo;
}