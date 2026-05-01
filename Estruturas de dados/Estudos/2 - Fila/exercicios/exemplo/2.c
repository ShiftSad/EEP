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
    if (queue->rear >= MAX) {
        exit(1);
    }
    
    queue->itens[queue->rear] = x;
    queue->rear = (queue->rear + 1) % MAX;
}

int size(Queue *queue) {
    return queue->rear - queue->front; 
}

int front(Queue *queue) {
    if (empty(queue)) {
        exit(1);
    }
    
    return queue->itens[queue->front];
}

int dequeue(Queue *queue) {
    if (empty(queue)) {
        exit(1);
    }
    
    int x = front(queue);
    queue->front++;
    
    return x;
}