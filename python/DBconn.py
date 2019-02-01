import mysql.connector
"""Deze functie maakt een connectie object aan en returned dit, zodat andere functies niet continue zelf dit object aan hoeven te maken."""
def DB():
    conn =mysql.connector.connect(
        user='dbUser',
        password='P@ssword',
        host='192.168.42.1',
        database='feedbacklamp') 
    return conn
