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
    if (s->pos >= MAX - 1) {
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

// Exercício 1: Inverter a pilha usando uma estrutura auxiliar
// Primeira forma, "trapaceando", saindo dos métodos de pilha e usando um ponteiro direto. 
void inverter_1(Stack *p) {
    if (empty(p)) {
        printf("Pilha vazia");
        return;
    }

    Stack aux;
    init(&aux);

    while (!empty(p)) {
        push(&aux, pop(p));
    }
    
    *p = aux;
}

// Segunda forma, usando duas stacks, assim eu não estou trapaceando,
// mas o exercício pede apenas uma stack
void inverter_2(Stack *p) {
    if (empty(p)) {
        printf("Pilha vazia");
        return;
    }

    Stack aux1;
    init(&aux1);
    
    Stack aux2;
    init(&aux2);

    while (!empty(p)) {
        push(&aux1, pop(p));
    }
    
    while (!empty(&aux1)) {
        push(&aux2, pop(&aux1));
    }
    
    while (!empty(&aux2)) {
        push(p, pop(&aux2));
    }
}

// Exercício 2: Trocar topo com a base usando uma pilha auxiliar
void trocar_topo_base(Stack *p) {
    if (size(p) < 2) {
        printf("Pilha vazia ou mt pequena");
        return;
    }

    Stack aux;
    init(&aux);

    const int first = pop(p);
    int last;
    
    while (!empty(p)) {
        if (size(p) == 1) {
            last = pop(p); 
            break;
        }
        push(&aux, pop(p));
    }
    
    push(p, first);
    while (!empty(&aux)) {
        push(p, pop(&aux));
    }
    
    push(p, last);
}

// Exercício 3: Pares na base, ímpares no topo
void separar_par_impar(Stack *p) {
    if (empty(p)) {
        printf("Pilha vazia");
        return;
    }

    Stack pares, impares;
    init(&pares);
    init(&impares);

    while (!empty(p)) {
        const int value = pop(p);
        if (value % 2 == 0) push(&pares, value);
        else push(&impares, value);
    }
    
    while (!empty(&pares)) {
        push(p, pop(&pares));
    }
    
    while (!empty(&impares)) {
        push(p, pop(&impares));
    }
}