""" 
ejemplo-07-matrices.py

Novedades:
- Arrays Bidimensionales (matrices)
- import -> importar librerias (del lenguaje)
- Función join
"""
import random

def pintaMatriz(filas,columnas):    # ejemplo: 2,3
    matriz = []
    for i in range (filas):   # 0...1
        fila = []
        for j in range (columnas):
            aleatorio = random.randint(1,10)
            fila.append(aleatorio)
            
        # Añado la fila a la matriz
        matriz.append(fila)
    
    # Pintamos la matriz
    for fila in matriz:
        filaFormateada = "\t" .join(str(valor) for valor in fila)
        print(filaFormateada)
      
# Llamo a la función  
filas = int(input("Dame filas Matriz: "))
columnas = int(input("Dame Columnas Matriz: "))
pintaMatriz(filas,columnas)

