#Print Statements
print("Hello World")

#Variables
x = 1
y = 2.5
z = 'hi'
a = True
print(x)

#Strings
x = "abc"
y = "de"
z = x + y
z
z = z[1:3]
z

#If Statements
if x > 1:
    print("x greater than 1")
elif x == 1:
    print("x equal to 1")    
else:
    print("x less than 1")

x = 2
if x + 1 == 4:
    print(x)

#For/While
for i in range(3):
    print(i)

i = 0
while i < 3:
    print(i)
    i += 1

#Loops
for i in range(1,100):
    if i%2 == 0:
        print(i)    

#Functions
def f(x):
    y = x + 2
    return y
f(5)

def mul(x,y):
    return x * y

#Recursion
def mul(x,y):
    if y == 1:
        return x
    return x * mul(x,y-1)

#OOP
class Number:
    def __init__(self,number):
        self.number = number

    def get_num(self):
        return self.number
    
#Data Structures

#Array (Lists in Python)
new_arr = [1, 2.5 , 'hi' , True]

#Linked List
class LinkedList:
    def init(self,val,next=None):
        self.val = val
        self.next = next

#Binaray Search Tree
class BST:
    def init(self, val, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right

#Hash Table
hash = {'a':1, 'b':2, 'c':3}

#Algorithms

#Big-O Notation: O(1), O(log(n)), O(n), O(nlog(n)), O(n^2), O(2^n), O(n!)

#Sorting Algorithms, Example below is selection sort
def selectionSort(array):
    for i in range(len(array)):
        min_index = i
        for j in range(i+1, len(array)):
            if array[min_index] > array[j]:
                min_index = j
        array[i] = array[min_index]
        array[min_index] = array[i]        