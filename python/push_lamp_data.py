import mysql.connector
import DBconn

def push_lamp_data(lamp_name, lamp_state, dbGem):
        conn = DBconn.DB()
        cursor = conn.cursor()
        try:
            cursor.execute('INSERT INTO lampdata (lamp_name, lamp_state, dbGem)'
                   "VALUES('{}','{}','{}')".format(lamp_name, lamp_state, dbGem))
            conn.commit()
        except pyodbc.IntegrityError:
            return 'Error', "Het is niet gelukt om de data te registreren. Neem contact op met de administrator."
        conn.close()
