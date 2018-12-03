/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_check_map.c                                     :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/03 17:53:20 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     **ft_check_map(int fd)
{
    char    *line;  // GNL (current line)
    char    *str;   // content of file
    char    **arr;  // lines
    int     **tab;  // final array   
    int     i;
    int     j;
    int     k;
    int     width;
    int     height;

    k = 0;
    height = 0;
    str = NULL;
    // read file and fill content
    while (get_next_line(fd, &line)) 
    {
        i = 0;
        j = 0;
        while (line && line[i])
        {
            if (line[i] >= '0' && line[i] <= '9' && (!i || line[i - 1] == ' '))
                j++;
            if (!(ft_isdigit(line[i])) && line[i] != ' ' && line[i] != '\n')
                return (NULL);
            i++;
        }
        if (!str)
            width = j;
        else if (j != width)
            exit(1);
        if (str == NULL)
            str = ft_strnew(1);
        else
            str = ft_strjoin(str, "\n");
        str = ft_strjoin(str, line);
        height++;
        free(line);                                 // leaks
    }
    // parse content to lines
    i = 0;
    arr = ft_strsplit(str, '\n');
    // parse lines to final array
    if (!(tab = (int **)malloc(sizeof(int *) * (height + 1))))
		return (NULL);
    while (i < height || (tab[i] = NULL))           // columns
    {
        j = 0;
        if (!(tab[i] = (int *)malloc(sizeof(int) * width)))
		    return (NULL);
        k = -1;
        while (arr[i] && arr[i][++k] && j < width)   // fill content
            if (arr[i][k] >= '0' && arr[i][k] <= '9' && (!k || arr[i][k - 1] == ' '))
                tab[i][j++] = ft_atoi(arr[i] + k);
        i++;
    }
    // int y;
    // int x;
    // y = 0;
    // while (y < height)
    // {
    //     x = 0;
    //     while (x < width)
    //     {
    //         printf("% 3d ", tab[y][x]);
    //         x++;
    //     }
    //     puts("");
    //     y++;
    // }
    return (tab);
}