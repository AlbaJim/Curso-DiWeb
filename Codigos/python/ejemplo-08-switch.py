""" 
ejemplo-08-match-case.py
Equivale a swich...case

Novedades:
- match -> Equivale al switch
- función lower
"""

dia = input("Dame dia semana: ")
match dia.lower():
    case 'lunes' | 'martes' | 'miercoles' | 'jueves' | 'viernes':
        print ("Toca currar!")
    case 'sabado' | 'domingo':
        print ("Finde!!")
    case _:     # default
        print ("Dia NO válido")