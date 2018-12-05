/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 13:24:39 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/05 18:11:18 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int		main(int argc, char **argv) // map en bzero
{
	t_all	*all;
	int		fd;
	// int		x = 0;
	// int		y = 0;

	if(!(all = (t_all *)ft_memalloc(sizeof(t_all))))
		return (-1);
	if (argc == 2)
	{
		fd = open(argv[1], O_RDONLY);
		ft_check_map(fd, all);
		// ft_create_window(x, y);
	}
	else
		ft_putstr("usage : only two arguments authorized.");
	return (0);
}