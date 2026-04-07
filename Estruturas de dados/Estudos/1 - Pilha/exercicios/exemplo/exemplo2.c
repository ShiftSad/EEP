#include <stdio.h>
#include <stdlib.h>

#define MAX 50

typedef struct {
    int pos;
    int data[MAX];
} Stack;

int empty(Stack *s) {
    return s->pos == -1;
}

int pop(Stack *s) {
    if (empty(s)) {
        printf("Empty stack");
        exit(1);
    }
    
    return s->data[s->pos--];
}

void push(Stack *s, int value) {
    if (s->pos >= MAX) {
        printf("Max stack size");
        exit(1);
    }
    
    s->data[++s->pos] = value;
}

int size(Stack *s) {
    return s->pos + 1;
}

int top(Stack *s) {
    return s->data[s->pos];
}

void init(Stack *s) {
    s->pos = -1;
}