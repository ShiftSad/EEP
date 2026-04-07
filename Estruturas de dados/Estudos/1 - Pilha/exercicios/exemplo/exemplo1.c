/**
 * Pilhas:
 * - LIFO (Last in, first out)
 * push - coloca uma informação na pilha
 * pop - tira uma informação da pilha
 * size - retorna o tamanho da pilha
 * peek - retorna o elemento superior da pilha sem removê-lo
 * empty - verifica se a pilha está vazia
 */

#include <stdio.h>
#define MAX 50

void push(int value);
int pop();
int size();
int peek();

int stack[MAX];
int pos = 0;

void push(int value) {
    if (pos > MAX) {
        printf("Pilha cheia!");
        return;
    }
    
    stack[pos] = value;
    pos++;
}

int pop() {
    return stack[--pos];
}

int size() {
    return pos;
}

int peek() {
    return stack[pos];
}