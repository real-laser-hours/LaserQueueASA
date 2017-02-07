print("test")

list = []
with open('test.txt') as f:
    for line in f:
        if line.strip()=="$EXTMAX":
            break

    for line in f:
        list.append(line)

        if line.strip()=="0.0":
            break

j = 0
for i in list:
    list[j]=i.rstrip("\n")
    j+=1

print(list)