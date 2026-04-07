/**
 * Filas
 * - Conjunto ordenado de itens a partir do qual se pode eliminar itens numa extremidade e inserir noutra extremidade
 *   FIFO (First in, first out)
 *
 * enqueue - Insere itens numa fila (final)
 * dequeue - Retira itens de uma fila (primeiro item)
 * empty - Verifica se a fila está vazia
 * size - Retorna o tamanho da fila
 * front - Retorna o próximo item a ser retirado
 */

#include <stdio.h>
#include <stdlib.h>

#define MAX 100

typedef struct {
    int itens[MAX];
    int front, rear;
} Queue;

int empty(Queue *queue);
void enqueue(Queue *queue, int x);
int size(Queue *queue);
int front(Queue *queue);
int dequeue(Queue *queue);

int empty(Queue *queue) {
    return queue->front == queue->rear;
}

void enqueue(Queue *queue, int x) {
    if (queue->rear + 1 >= MAX) {
        printf("Capacidade máxima da fila");
        exit(1);
    }
    
    queue->itens[queue->rear++] = x;
}

int size(Queue *queue) {
    return queue->rear + 1;
}

int front(Queue *queue) {
    return queue->front;
}

int dequeue(Queue *queue) {
    if (empty(queue)) {
        printf("Fila vazia");
        exit(1);
    }

    int x;
    x = queue->itens[0];
    for (int i = 0; queue->rear; i++) {
        queue->itens[i] = queue->itens[i + 1];
    }
    
    queue->rear--;
    return x;
}