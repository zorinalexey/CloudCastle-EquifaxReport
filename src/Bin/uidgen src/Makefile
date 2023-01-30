CC=gcc
CFLAGS=-c -Wall

ifeq ($(OS),Windows_NT)
		LDFLAGS=-lcrypt32
else
		LDFLAGS=
endif

all: uidgen


uidgen: uidgen.o uid.o uuid.o
		$(CC) $(LDFLAGS) uuid.o uid.o uidgen.o -o uidgen

uidgen.o: uidgen.c
		$(CC) $(CFLAGS) uidgen.c
		
uid.o: uid.c
		$(CC) $(CFLAGS) uid.c

uuid.o: uuid.c
		$(CC) $(CFLAGS) uuid.c

clean:
		rm -rf *.o uidgen uidgen.exe
