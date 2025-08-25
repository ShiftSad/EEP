#include <stdio.h>

void swap(int *a, int *b) {
    const int temp = *a;
    *a = *b;
    *b = temp;
}

int main() {
    int a = 10;
    int b = 20;

    swap(&a, &b);
    printf("A: %d B: %d", a, b);
}