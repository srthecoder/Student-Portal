#!C:/Users/Swachandrika/AppData/Local/Programs/Python/Python39/python.exe
import cgi
# create instance of fieldStorage
form = cgi.FieldStorage()
# get data from fields
n = form.getvalue('name')
r = form.getvalue('rno')
ph = form.getvalue('pno')
ad = form.getvalue('add')
m1 = int(form.getvalue('m1'))
m2 = int(form.getvalue('m2'))
m3 = int(form.getvalue('m3'))
m4 = int(form.getvalue('m4'))
m5 = int(form.getvalue('m5'))
m6 = int(form.getvalue('m6'))

t = m1 + m2 + m3 + m4 + m5 + m6
p = (t/600)*100

if form.getlist("course"):c = form.getlist("course")
else:c = "Not selected!"
if form.getlist("favsub[]"):fav = form.getlist("favsub[]")
else:fav = "Not selected!"
if form.getlist("activity[]"):act = form.getlist("activity[]")
else:act = "Not selected!"

def grade(g):
    if g>=90: return{"Grade":"S","Performance":"Outstanding"}
    elif g>=75: return{"Grade":"A","Performance":"Excellent"}
    elif g>=70: return{"Grade":"B","Performance":"Good"}
    elif g>=60: return{"Grade":"C","Performance":"Average"}
    elif g>=50: return{"Grade":"D","Performance":"Pass"}
    else: return{"Grade":"F","Performance":"Fail"}

g = grade(p)

print("Content-type:text/html\r\n\r\n")
print("<html>")
print("<head><style>div{margin-right: 4%; border: 2px solid teal; float: left;border-radius: 5px; background-color: honeydew; padding: 20px; box-shadow: 4px 2px 4px 2px rgba(0,0,0,.2);}")
print("h2{margin-top: 0.5%;font-family: SourceSansPro;font-size: 35px;text-shadow: 2px 2px 2px darkcyan;color: mediumturquoise;}")
print("body{background-color: darkturquoise;}</style>")
print("<title> GRADES </title>")
print("</head>")
print("<body>")
print("<div style =\"margin-left: 4% \"><h2>----------------Student Details----------------</h2>")
print("<b>Name:</b> %s &emsp;<b>Roll No.: </b>%s &emsp;<b>Course: </b>%s"%(n,r,c[0]))
print("<h4>\n</h4><b>Phone No.: </b>%s &emsp;<b>Address: </b>%s"%(ph,ad))
print("<br><br><br><div style =\"background-color: mintcream;\"><b>Favourite subjects:</b>")
for i in fav:
    print("<h4>\n</h4>%s"%i)
print("</div><div style =\"background-color: mintcream;\"><b>Activities:</b>")
for i in act:
    print("<h4>\n</h4>%s"%i)
print("</div></div>")
print("<div><h2>--------MARKSHEET--------</h2>")
print("<div style =\"background-color: mintcream;\">")
print("<b>Maths: </b>%s&emsp;&emsp;<b>Computer Science: </b>%s"%(m1,m2))
print("<h4>\n</h4><b>Physics: </b>%s&emsp;&emsp;<b>Chemistry: </b>%s"%(m3,m4))
print("<h4>\n</h4><b>Practical I: </b>%s&emsp;&emsp;<b>Practical II: </b>%s"%(m5,m6))
print("</div><br><br><br><br><br><br><br><br><br><b>Total Score: </b>%s/600"%t)
print("<h4>\n</h4><b>Grade: </b>%s &emsp;&emsp;<b>Performance: </b>%s"%(g.get("Grade"),g.get("Performance")))
print("</div></body>")
print("</html>")
