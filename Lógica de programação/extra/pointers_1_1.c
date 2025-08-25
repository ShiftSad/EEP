#include <stdio.h>

void swap(int *a, int *b);

int main() {
    int a = 10;
    int b = 50;
    swap(&a, &b);

    printf("A: %d B: %d", a, b);
}

void swap(int *a, int *b) {
    const int temp = *a;
    *a = *b;
    *b = temp;
}
