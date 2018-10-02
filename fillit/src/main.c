/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 19:58:37 by shcohen           #+#    #+#             */
/*   Updated: 2018/10/02 21:17:39 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

int		main(int argc, char **argv)
{
	int			fd;
	char		*buf;
	t_tetris	*first;
    t_vars      vars;

	if (argc != 2)
	{
		puts("usage: ./fillit [map with tetriminos]");
		return (1);
	}
	fd = ft_openfile(argv[1]);
	buf = ft_readfile(fd);
	ft_closefile(fd);
	ft_create_tetris(&vars, buf, &first);
    while (first != NULL)
    {
        printf("%s\n\n", first->tetris);
        first = first->next;
    }

	return (0);
}